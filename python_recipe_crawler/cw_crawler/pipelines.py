# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: http://doc.scrapy.org/en/latest/topics/item-pipeline.html

import json
import scrapy

from scrapy.conf import settings
from pymongo import MongoClient
from scrapy.exceptions import DropItem
from scrapy import log
from scrapy.contrib.pipeline.images import ImagesPipeline

class MyImagesPipeline(ImagesPipeline):
    def get_media_requests(self, item, info):
        for image_url in item['image_urls']:
            yield scrapy.Request(image_url)

    def item_completed(self, results, item, info):
        image_paths = [x['path'] for ok, x in results if ok]
        if not image_paths:
            raise DropItem("Item contains no images")
        item['image_paths'] = image_paths
        return item

class MongoDBPipeline(object):
    def __init__(self):
        connection = MongoClient(
            settings['MONGODB_SERVER'],
            settings['MONGODB_PORT']
        )
        db = connection[settings['MONGODB_DB']]
        self.collection = db[settings['MONGODB_COLLECTION']]

    def process_item(self, item, spider):
        if spider.name not in ['ingredients']:
            return item
        valid = True
        for data in item:
            if not data:
                valid = False
                raise DropItem("Missing {0}!".format(data))
        if valid:
            self.collection.insert(dict(item))
            log.msg("Item added to MongoDB database!", level=log.DEBUG, spider=spider)
        return item


class JsonWriterPipeline(object):
    def __init__(self):
        pass
        # self.file = open('ingredients.jl', 'wb')

    def process_item(self, item, spider):
        # if spider.name not in ['ingredients']:
        #     return item
        # line = json.dumps(dict(item)) + "\n"
        # self.file.write(line)
        return item

#
# class CwCrawlerPipeline(object):
#     def process_item(self, item, spider):
#         return item
