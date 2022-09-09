from selenium.webdriver.common.by import By


class RMITResultPage:

  # Locators
  CLOTH_TITLE = (By.ID, 'collection-desc')
  
  # Initializer

  def __init__(self, browser):
    self.browser = browser

  # Interaction Methods

  def description_value(self):
    desc = self.browser.find_element(*self.SEARCH_INPUT)
    value = desc.get_attribute('value')
    return value

  def title(self):
    return self.browser.title
