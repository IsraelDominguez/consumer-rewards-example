Consumer Rewards SDK - Example
==============================

You also need to set the Username and Password for your Consumer Rewards app as environment variables with the following names respectively: `CR_USERNAME` and `CR_PASSWORD`.

For that, if you just create a file named `.env` in the directory and set the values like the following, the app will just work:

````bash
# .env file for test, must change enpoints and auth for production environment
USERNAME=myCRUser
PASSWORD=myCRpassword
API=https://api-consumerrewards-test.pernod-ricard-espana.com
WEB=https://consumerrewards-test.pernod-ricard-espana.com
````

Once you've set those environment variables, just run the following to get the app started:

````bash
php -S localhost:3001
````

Now, try calling [http://localhost:3001/samples(http://localhost:3001/samples)