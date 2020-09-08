#!/bin/bash

sudo rm -rf .docker/mysql/data

sh .bin/stop.sh
sh .bin/exec.sh
