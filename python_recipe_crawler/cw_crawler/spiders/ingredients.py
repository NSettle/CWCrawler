# -*- coding: utf-8 -*-
import scrapy
import string

from scrapy.http import Request
from scrapy.selector import Selector
from cw_crawler.items import IngrItem


class IngredientsSpider(scrapy.Spider):
    name = "ingredients"
    # allowed_domains = ["www.domain.com"]
    start_urls = (
        'http://www.makemeacocktail.com/ingredients/',
    )

    def parse(self, response):
        base_url = 'http://www.makemeacocktail.com/scripts/ajaxcalls.php?ajaxCall=in_loadIngredient&typee=letter&letter='
        for letter in string.ascii_uppercase:
            url = base_url + letter
            yield Request(url, callback = self.parseIngredient)

    def parseIngredient(self, response):
        new_body = response.body.decode("unicode_escape").replace("\\", "")
        response = response.replace(body = new_body)
        # self.log(response.body)
        ingredients = Selector(response).xpath('//img')
        for ingr in ingredients:
            item = IngrItem()
            item['title'] = ingr.xpath('@title').extract()[0]
            self.log(item['title'])
            yield item

