# -*- coding: utf-8 -*-
import scrapy

from cw_crawler.items import IngrItem

class RecipesSpider(scrapy.Spider):
    name = "recipes"
    allowed_domains = ["http://www.makemeacocktail.com/"]
    start_urls = (
        'http://www.makemeacocktail.com/ingredients/',
    )

    def parse(self, response):
        for sel in response.xpath('//img'):
            item = IngrItem()
            item['title'] = sel.xpath('@title').extract()
            print(item['title'])
            yield item