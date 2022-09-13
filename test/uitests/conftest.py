import pytest
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager


@pytest.fixture
def browser():
  #change web url here if needed test local
  url = f"http://54.85.101.87/"
  chrome_options = Options()

  options = [
      "--headless", "--disable-gpu", "--ignore-certificate-errors",
      "--disable-extensions", "--no-sandbox", "--disable-dev-shm-usage"
  ]
  for option in options:
    chrome_options.add_argument(option)

  driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()),
                            options=chrome_options)
  driver.set_page_load_timeout(30)
  driver.get(url)
  yield driver
  driver.quit()
