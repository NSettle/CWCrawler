# -*- coding: utf-8 -*-

# Scrapy settings for cw_crawler project
#
# For simplicity, this file contains only the most important settings by
# default. All the other settings are documented here:
#
#     http://doc.scrapy.org/en/latest/topics/settings.html
#

BOT_NAME = 'cw_crawler'

SPIDER_MODULES = ['cw_crawler.spiders']
NEWSPIDER_MODULE = 'cw_crawler.spiders'

IMAGES_STORE = '/home/ferreri/repos/CWCrawler/img'

ITEM_PIPELINES = {
    # 'myproject.pipelines.JsonWriterPipeline': 800,
    'scrapy.contrib.pipeline.images.ImagesPipeline': 1,
    'cw_crawler.pipelines.MongoDBPipeline': 300,
    'cw_crawler.pipelines.JsonWriterPipeline': 100
}
MONGODB_SERVER = "localhost"
MONGODB_PORT = 27017
MONGODB_DB = "cocktail_wizard"
MONGODB_COLLECTION = "ingredients"

# Crawl responsibly by identifying yourself (and your website) on the user-agent
#USER_AGENT = 'cw_crawler (+http://www.yourdomain.com)'
