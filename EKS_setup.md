# EKS Setting up in AWS 🛍️

This is the guideline to set up the kubernetes on AWS

Here is the instructions to setup the eks with auto-balancing and auto-scaling using HELM

## 📙 0. Set up necessary configuration for the kubernetes

Before making any further adjustment, you need to add the following policies to the your roles which places in folder aws/policies

Moreover, you also need to set up the aws.cli, kubectl, eksctl and helm.

## 📙 1. Create the cluster

To create the cluster using the following command
```
eksctl create cluster --name=devops-eks-cluster  --region us-east-1 --node-type t2.small --nodes-min 2 --nodes-max 2 --zones=us-east-1a,us-east-1b,us-east-1c
```

And update the config using the following command
```
aws eks --region us-east-1 update-kubeconfig --name devops-eks-cluster
```

## 📜 2. Create the iamserviceaccount for the cluster

Creating the IAM OIDC provider for your cluster so that it can establish the trust between an OIDC-compatible IdP and your AWS account.

```
eksctl utils associate-iam-oidc-provider --region=us-east-1 --cluster=devops-eks-cluster --approve
```

Creating iamserviceaccount for auto-scaling group.
```
eksctl create iamserviceaccount  --cluster=devops-eks-cluster   --namespace=kube-system   --name=cluster-autoscaler   --attach-policy-arn=arn:aws:iam::353801319017:policy/AmazonEKSClusterAutoscalerPolicy --region=us-east-1   --override-existing-serviceaccounts --approve
```

Creating iamserviceaccount for load-balancer group.
```
eksctl create iamserviceaccount --cluster=devops-eks-cluster --namespace=kube-system --name=aws-load-balancer-controller --attach-policy-arn=arn:aws:iam::353801319017:policy/AWSLoadBalancerControllerIAMPolicy --override-existing-serviceaccounts --region=us-east-1 --approve
```

Creating iamserviceaccount for secret manager with the same namespace of your application
```
eksctl create iamserviceaccount  --cluster=devops-eks-cluster   --namespace=rmitstore   --name=secret-manager   --attach-policy-arn=arn:aws:iam::353801319017:policy/SecretManager   --override-existing-serviceaccounts --region=us-east-1 --approve
```


## ⚙️ 3. Helm repo setup

Helm is the service that help us packing the kubernetes.

In addition to use the load-balancer controller, we need to have some setup.
```
kubectl apply -k "github.com/aws/eks-charts/stable/aws-load-balancer-controller//crds?ref=master" # Install the TargetGroupBinding
helm repo add eks https://aws.github.io/eks-charts #Deploy the Helm charts
helm upgrade -i aws-load-balancer-controller eks/aws-load-balancer-controller -n kube-system --set clusterName=devops-eks-cluster --set serviceAccount.create=false  --set serviceAccount.name=aws-load-balancer-controller --set region=us-east-1
```

As same as above, we also need to add the repo of autoscaler to the helm repository
```
helm repo add autoscaler https://kubernetes.github.io/autoscaler
helm install -n kube-system csi-secrets-store secrets-store-csi-driver/secrets-store-csi-driver
```

As same as above, we also need to add the repo of secret manager to the helm repository
```
helm repo add secrets-store-csi-driver https://kubernetes-sigs.github.io/secrets-store-csi-driver/charts
helm upgrade -i cluster-autoscaler autoscaler/cluster-autoscaler -n kube-system --set clusterName=devops-eks-cluster --set image.tag="v2.2.0" 
```

After that, we need configure the AWS ALB and Autoscaling to sit in front of Ingress
```
kubectl -n kube-system rollout status deployment cluster-autoscaler
```

Next we will install the application
```
helm install rmitstore heml-charts
```

## 💻 4. Open the website

After that, you can access to the UI by using this command
```
kubectl get ingress --all-namespaces
```
