help:
	@echo "Check the make file to see what commands can be used"

docker.start:
	@docker-compose up -d

docker.stop:
	@docker-compose stop

docker.build:
	@docker-compose build --no-cache

docker.wp.bash:
	@docker-compose exec wordpress bash

docker.db.bash:
	@docker-compose exec mysql bash

docker.run.wpcli:
	@docker-compose run --rm wpcli

