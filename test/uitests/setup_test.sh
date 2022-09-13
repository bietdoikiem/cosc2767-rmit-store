#!/bin/bash

# Setup installation of Selenium dependencies via pipenv
pip install pipenv
pipenv install pytest
pipenv install selenium
pipenv install webdriver_manager