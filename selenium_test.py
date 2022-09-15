from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from webdriver_manager.core.utils import ChromeType

chrome_service = Service(
    ChromeDriverManager(chrome_type=ChromeType.CHROMIUM).install())

chrome_options = Options()
options = [
    "--headless", "--disable-gpu", "--ignore-certificate-errors",
    "--disable-extensions", "--no-sandbox", "--disable-dev-shm-usage"
]
for option in options:
  chrome_options.add_argument(option)

driver = webdriver.Chrome(service=chrome_service, options=chrome_options)

#driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=chrome_options)

driver.get('http://35.153.46.184/')
driver.quit()
