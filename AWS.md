# Deploy APP to AWS

### Links

[Deploying a High-Availability PHP App to AWS](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/php-ha-tutorial.html)
[PostgreSQL Procedural Importing](https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/PostgreSQL.Procedural.Importing.html)

## Setting AWS EBS

[Login to AWS console](https://aws.amazon.com/)

- [Open the Elastic Beanstalk console.](https://console.aws.amazon.com/elasticbeanstalk)

- Click `Create and connect to a database`

- Click on `Create New Application` add Name and Description

- Click on `Create one now` to create environment

- Select `Web server environment`

- Choose `PHP` in `Preconfigured platform` and press `Create environment`

-  This will take a few minutes.

- Choose Configuration.

- On the Software configuration card, choose Modify.

- For Document Root, type /public.

- Choose Apply.

- When the update is complete, click the URL to reopen your site in the browser.


- [Navigate to the management page for your environment. ](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/environments-console.html)

- Choose Configuration.

- Under Database, choose Modify.

- For DB engine, choose postgres V 10.4 and size you need (min 5Gb)

- Type a master username and password. Elastic Beanstalk will provide these values to your application using environment properties.

- Choose Apply.


## Deploy

```bash
zip ../bi-app.zip -r * .[^.]* -x "vendor/*"
```

- [Open the Elastic Beanstalk console.](https://console.aws.amazon.com/elasticbeanstalk)

- [Navigate to the management page for your environment. ](https://docs.aws.amazon.com/elasticbeanstalk/latest/dg/environments-console.html)

- Choose Upload and Deploy.

- Choose Choose File and use the dialog box to select the source bundle.

- Choose Deploy.

- When the deployment completes, choose the site URL to open your website in a new tab.


## Connect to RDS from local net

- Go to RDS page

- Click on Security Groups

- Click on Inbound -> Edit -> Add Rule (All TCP, Sourse:YourIP) -> Save

On local machine:

```bash
psql \
   --host=aa1bg0ypxxz5nef.cuk0ayopwgmf.eu-central-1.rds.amazonaws.com \
   --port=5432 \
   --username=dbuser \
   --password \
   --dbname=postgres
```