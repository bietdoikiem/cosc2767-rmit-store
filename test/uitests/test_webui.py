from conftest import browser
from search import RMITSearchPage
from result import RMITResultPage


def test_homepage(browser):
    search_page = RMITSearchPage(browser)

    search_page.load()
    web_title = search_page.title()

    # Then the title contains
    assert "RMIT Store" in web_title 

def test_cloth_btn(browser):
    search_page = RMITSearchPage(browser)
    result_page = RMITResultPage(browser)

    search_page.load()
    search_page.cloth_btn()
  
  # And new web tittle contains
    assert "Apparel" in result_page.title()


def test_accessories_btn(browser):
    search_page = RMITSearchPage(browser)
    result_page = RMITResultPage(browser)

    search_page.load()
    search_page.accessories_btn()

  # And new web tittle contains
    assert "Accessories" in result_page.title()


def test_course_btn(browser):
    search_page = RMITSearchPage(browser)
    result_page = RMITResultPage(browser)

    search_page.load()
    search_page.course_btn()

  # And new web tittle contains
    assert "Course" in result_page.title()


def test_special_btn(browser):
    search_page = RMITSearchPage(browser)
    result_page = RMITResultPage(browser)

    search_page.load()
    search_page.special_btn()

  # And new web tittle contains
    assert "Special Collection" in result_page.title()


def test_sale_btn(browser):
    search_page = RMITSearchPage(browser)
    result_page = RMITResultPage(browser)

    search_page.load()
    search_page.sale_btn()

  # And new web tittle contains
    assert "Sale" in result_page.title()


def test_buy_btn(browser):
    search_page = RMITSearchPage(browser)

    search_page.load()
    url = search_page.buy_btn()

  # And new web tittle contains
    assert "item-list" in url
