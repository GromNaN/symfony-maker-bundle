The Symfony MakerBundle
=======================

The MakerBundle is the fastest way to generate the most common code you'll
need in a Symfony app: commands, controllers, form classes, event subscribers
and more!

Scope
-----

This project is aimed at developers who are new to a given Symfony feature and
want a working starting point without writing boilerplate code. That includes
absolute Symfony beginners, but also experienced developers picking up an
unfamiliar component. It generates code that follows the current recommended
best practices, with sensible defaults and minimal configuration.

A maker is kept even if a project only runs it once, because that single run
is precisely when the developer benefits the most from a working skeleton. On
the other hand, makers whose output is fully covered by a Flex recipe, or that
duplicate another maker, are out of scope.

For any requirement not covered by these defaults (custom templates, alternative
target directories, extended generators, opinionated code shapes, etc.), we
recommend using coding agents with dedicated skills, or other code-generation
tools. See [Symfony Mate][3] for an AI-assisted, skills-based approach.

As a consequence:

- Options and switches that exist only to cover edge cases or personal
  preferences will not be added. The generated code always reflects our current
  recommended defaults and may evolve between releases.
- Requests to make the generators broadly extensible, configurable, or
  pluggable are out of scope.
- Only the latest Symfony LTS is supported. The generated code targets that
  LTS. New makers for post-LTS features may still be added, with a runtime
  check on the required dependency versions.

Documentation
-------------

[Read the documentation on Symfony.com][1]

Backwards Compatibility Promise
-------------------------------

This bundle shares the [backwards compatibility promise][2] from
Symfony. But, with a few clarifications.

A) The input arguments or options to a command *may* change between
   minor releases. If you're using the commands in an automated,
   scripted way, be aware of this.

B) The generated code itself may change between minor releases. This
   will allow us to continuously improve the generated code!

[1]: https://symfony.com/doc/current/bundles/SymfonyMakerBundle/index.html
[2]: https://symfony.com/doc/current/contributing/code/bc.html
[3]: https://symfony.com/doc/current/ai/components/mate.html

---

Build Documentation Locally
---------------------------

This is not needed for contributing, but it's useful if you would like to debug some
issue in the docs or if you want to read MakerBundles Documentation offline.

```bash
cd _docs_build/

composer install

php build.php
```

After generating docs, serve them with the internal PHP server:

```bash
php -S localhost:8000 -t output/
```

Browse `http://localhost:8000` to read the docs.
