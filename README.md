
# Deprecated
This version is obsolete.
The new version is here: https://github.com/dimdam/members



# Members Offline Subscription Management

A simple app to keep track of members for a local club . The administrator
can create or update members and their subscriptions,and notify them via sms using Nexmo API.


<center><img src="https://user-images.githubusercontent.com/7516919/116776196-cea5db80-aa6f-11eb-8ed8-a9dfc6abc900.png" width="45%"> </center>


## Features

- Create/Update Members
- SMS texting using [Nexmo API](https://www.vonage.com/communications-apis/)
- Print ballot paper with candidates names for upcoming elections 

  
## Screenshots

<img src="https://user-images.githubusercontent.com/7516919/116775920-791cff00-aa6e-11eb-9f72-654520ae573d.png" width="45%"></img> <img src="https://user-images.githubusercontent.com/7516919/116775923-79b59580-aa6e-11eb-9e7a-3099f3703123.png" width="45%"></img> <img src="https://user-images.githubusercontent.com/7516919/116775924-7cb08600-aa6e-11eb-8cb9-0e14d89b120f.png" width="45%"></img> <img src="https://user-images.githubusercontent.com/7516919/116775925-7d491c80-aa6e-11eb-9a6d-21f62d8221e5.png" width="45%"></img> 
  
## Environment Variables

To run this project, you will need to add the following environment variables to your .env file.You can obtain them
through Nexmo dashboard.

`NEXMO_KEY=`

`NEXMO_SECRET=`

## Run Locally

Clone the project

```bash
 git clone git@github.com:dimdam/members.git
```

Go to the project directory

```bash
  cd project-folder
```

Configure the .env file with your DB credentials and then migrate the database

```bash
php artisan migrate 
```

Start the server

```bash

php artisan serve

```
  
