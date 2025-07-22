#!/bin/sh

if [ -d /tmp/conf.d ] && [ -z "$(ls -A /docker/nginx/conf.d 2>/dev/null)" ]; then
  mkdir -p /docker/nginx/conf.d
  cp -r /tmp/conf.d/* /docker/nginx/conf.d/
fi

exec "$@"
