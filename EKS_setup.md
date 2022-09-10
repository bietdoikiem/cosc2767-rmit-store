# EKS Setting up in AWS 🛍️

This is the guideline to set up the kubernetes on AWS

Here is the instructions to setup the eks with auto-balancing and auto-scaling using HELM

## 📙 0. Set up necessary configuration for the kubernetes

Before making any further adjustment, you need to add the following policies to the your roles which places in foldere aws/policies

Moreover, you also need to set up the aws.cli, kubectl, eksctl and helm install by running the run.sh script

## 📙 1. Create the cluster

To create the cluster using the following command
```
eksctl create cluster --name=devops-eks-cluster  --region us-east-1 --node-type t2.small --nodes-min 2 --nodes-max 2 --zones=us-east-1a,us-east-1b,us-east-1c
```


## 📜 2. Create the iamserviceaccount for the cluster

Creating the IAM OIDC provider for your cluster so that it can establish the trust between an OIDC-compatible IdP and your AWS account.

```
eksctl utils associate-iam-oidc-provider --region=us-east-1 --cluster=devops-eks-cluster --approve
```

Creating iamserviceaccount for auto-scaling group.
```
eksctl create iamserviceaccount  --cluster=devops-eks-cluster   --namespace=kube-system   --name=cluster-autoscaler   --attach-policy-arn=arn:aws:iam::353801319017:policy/AmazonEKSClusterAutoscalerPolicy   --override-existing-serviceaccounts --approve
```

Creating iamserviceaccount for load-balancer group.
```
eksctl create iamserviceaccount --cluster=devops-eks-cluster --namespace=kube-system --name=aws-load-balancer-controller --attach-policy-arn=arn:aws:iam::353801319017:policy/AWSLoadBalancerControllerIAMPolicy --override-existing-serviceaccounts --approve
```


## ⚙️ 3. Helm repo setup

Helm is the service that help us packing the kubernetes. 

In addition to the php package, you’ll need php-mysql, a PHP module that allows PHP to communicate with MySQL-based databases.
```
kubectl apply -k "github.com/aws/eks-charts/stable/aws-load-balancer-controller//crds?ref=master" # Install the TargetGroupBinding
helm repo add eks https://aws.github.io/eks-charts #Deploy the Helm charts
helm upgrade -i aws-load-balancer-controller eks/aws-load-balancer-controller -n kube-system --set clusterName=devops-eks-cluster --set image.tag="v2.2.0" --set serviceAccount.create=false  --set serviceAccount.name=aws-load-balancer-controller --set region=us-east-1
```

```
helm repo add autoscaler https://kubernetes.github.io/autoscaler 
helm upgrade -i cluster-autoscaler autoscaler/cluster-autoscaler -n kube-system --set clusterName=devops-eks-cluster --set image.tag="v2.2.0" --set serviceAccount.create=false  --set serviceAccount.name=cluster-autoscaler
```

## 🛠️ 4. Install Apache server

You need to install Apache server to serve your content.
```
sudo yum install -y httpd
sudo service httpd start
sudo systemctl enable httpd
```

## 💡 5. Git clone the website from Github to the root folder of Apache

You need to fork this Github repo first to your Github account.

You need to install git and git clone the github repo to the directory "/var/www/html/" as it is the default root folder of the Apache web server.
```
sudo yum install -y git
git clone <your-git-repo-url> /var/www/html/
```

In the file index.php located in the website directory, we got this PHP script to connect to the MariaDB database.
```
$link = mysqli_connect(
    "localhost",
    "db_admin",
    "rmit_password",
    "rmit_store_db"
);
```
Note: Notice the "localhost" and change it accordingly!

## 💻 6. Open the website

Open the website via the public IP address or the domain name via the default port http 80!

Behold, it's time to buy some RMIT glorious merchandise!
<img src="https://i.imgur.com/xNHx6Ue.png">

Profit💸💰! Sweet and simple to deploy this website!

## 🏆 Author
- Huynh Nguyen Minh Thong (Tom Huynh) - tomhuynhsg@gmail.com
