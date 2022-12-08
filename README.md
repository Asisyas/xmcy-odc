# XMCY-ODC - PHP Exercise - v21.0.5

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework, with full [HTTP/2](https://symfony.com/doc/current/weblink.html), HTTP/3 and HTTPS support.

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Create `.env.local` and set `RAPID_HISTORY_SECRET_KEY=<apikeysecretvalue>`  
3. Run `make build` to build fresh images
4. Run `make up` (the logs will not be displayed in the current shell. Use `make logs` if you want to see the container's log after it has started.)
5. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
6. Run `make down` to stop the Docker containers.

## Features

* Production, development and CI ready
* Automatic HTTPS (in dev and in prod!)
* HTTP/2, HTTP/3 and [Preload](https://symfony.com/doc/current/web_link.html) support
* Built-in [Mercure](https://symfony.com/doc/current/mercure.html) hub
* Native [XDebug](docs/xdebug.md) integration

## Docs

1. [Build options](docs/build.md)
2. [Deploying in production](docs/production.md)
3. [Debugging with Xdebug](docs/xdebug.md)
4. [TLS Certificates](docs/tls.md)
5. [Troubleshooting](docs/troubleshooting.md)

## TODO's:

- [x] Receiver: Historical quotes
- [x] Receiver: Symbols
- [x] Reports: Chart
- [X] Reports: Table
- [x] Reports: simple abstraction layer
- [X] Form: validation (email, dates, symbol)
- [x] Form: autocomplete (wildcard, equals)
- [x] Simple GitHub CI [Example success build](https://github.com/Asisyas/xmcy-odc/actions/runs/3642711018/jobs/6150122961)
- [x] Exceptions
- [x] Docker environment
- [ ] Close all TODO's
- [ ] Email sender  
- [ ] Unit tests
- [ ] Frontend tests
