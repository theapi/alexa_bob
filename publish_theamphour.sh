
# see https://developer.amazon.com/blogs/post/Tx1UE9W1NQ0GYII/publishing-your-skill-code-to-lambda-via-the-command-line-interface

rm index.zip
cd js
cp theamphour.config.json config.json
zip -X -r ../index.zip *
cd ..
aws lambda update-function-code --function-name theamphour --zip-file fileb://index.zip
