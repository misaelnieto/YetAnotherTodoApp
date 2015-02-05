#!/bin/bash
# Usa bundle exec compass watch para compilar al vuelo
bundle
bower install
bundle exec compass compile
