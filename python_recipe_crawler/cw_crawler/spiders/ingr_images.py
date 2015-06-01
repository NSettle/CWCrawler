# -*- coding: utf-8 -*-
import scrapy
import json

from urllib import quote
from scrapy.http import Request
from scrapy.selector import Selector
from cw_crawler.items import IngrItem

class IngrImagesSpider(scrapy.Spider):
    name = "ingr_images"
    # allowed_domains = ["images.google.com"]
    start_urls = (
        'http://www.images.google.com/',
    )
    base_url = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&start=1&rsz=3&as_filetype=png&q="
    file_name = "test.jl"

    def parse(self, response):
        data = []
        with open(self.file_name) as data_file:
            for line in data_file:
                data.append(json.loads(line))
        for item in data:
            url = self.base_url + quote(item["title"])
            self.log(url)
            yield Request(url, callback = self.parseResults)

    def parseResults(self, response):
        # self.log(1234)
        self.log(response.body)
        data = json.loads(response.body)
        self.log(data)