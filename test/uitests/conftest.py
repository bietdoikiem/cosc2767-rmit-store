import pytest
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.chrome.service import Service

@pytest.fixture
def browser():
    #change web url here if needed test local
    url = f"http://54.85.101.87/"
    chrome_options = Options()

    options = [
        "--headless",
        "--disable-gpu",
        "--ignore-certificate-errors",
        "--disable-extensions",
        "--no-sandbox",
        "--disable-dev-shm-usage"
    ]
    for option in options:
        chrome_options.add_argument(option)

    driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=chrome_options)
    driver.get(url)
    driver.implicitly_wait(5)
    yield driver
    driver.quit()
