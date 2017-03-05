
# see https://developer.amazon.com/blogs/post/Tx1UE9W1NQ0GYII/publishing-your-skill-code-to-lambda-via-the-command-line-interface

rm index.zip
cd js
zip -X -r ../index.zip *
cd ..
aws lambda update-function-code --function-name bob --zip-file fileb://index.zip
