#!/bin/bash
#This script is used to convert HEIC to JPG and MOV to MP4 in the folder

#Define the path to the media folder
path=""

#Convert HEIC to JPG
for file in $path*.HEIC; do
    if [ -f "$file" ]; then
        echo "Converting $file to JPG"
        convert $file ${file%.*}.png
        rm "$file"
    fi
done

#Convert heic to JPG
for file in $path*.heic; do
    if [ -f "$file" ]; then
        echo "Converting $file to JPG"
        convert $file ${file%.*}.png
        rm "$file"
    fi
done

#Convert MOV to MP4 with ffmpeg
for file in $path*.MOV; do
    if [ -f "$file" ]; then
        echo "Converting $file to MP4"
        ffmpeg -i $file -c:v libx264 -crf 23 -c:a aac -b:a 128k ${file%.*}.mp4
        rm "$file"
    fi
done

#Convert mov to MP4 with ffmpeg
for file in $path*.mov; do
    if [ -f "$file" ]; then
        echo "Converting $file to MP4"
        ffmpeg -i $file -c:v libx264 -crf 23 -c:a aac -b:a 128k ${file%.*}.mp4
        rm "$file"
    fi
done