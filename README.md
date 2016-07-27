# BRSheet

Web that builds character sheets from Blood Red Sands roleplaying game.

Requisites:

## Required applications

 * docker (https://docs.docker.com/installation/)
 * git  (https://github.com/)

## Installation

  1. Clone the repository:
	
```shell 
 git clone git@github.com:Dennettlander/BRS.git
```

  2. Create Docker container:

```shell
docker-compose up -d
```
  3. Install dependencies:
  
```shell
docker-compose exec brsweb composer install
```
## Development

  1. Run the bash:
  
  ```shell
  docker-compose exec brsweb bash
   ```
   