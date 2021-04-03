#!/usr/bin/env bash
while true; do
  ls -d web/* | entr -d docker-compose up -d --build
done