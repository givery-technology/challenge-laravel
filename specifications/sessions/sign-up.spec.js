"use strict";

var
    assert = require("chai").assert,
    spec = require("api-first-spec"),
    config = require("../config.json"),
    knex = require('knex')(config.database);

var API = spec.define({
    "endpoint": "/api/join",
    "method": "POST",
    "request": {
        "contentType": spec.ContentType.JSON,
        "params": {
            "username": "string",
            "password": "string",
            "email": "string"
        },
        "rules": {
            "username": {
                "required": true
            },
            "password": {
                "required": true
            },
            "email": {
                "required": true
            }
        }
    },
    "response": {
        "contentType": spec.ContentType.JSON,
        "data": {
            "id": "number",
            "email": "string",
            "succeed": "boolean",
        },
        "rules": {
            "id": {
              "required": function (data) {
                return data.succeed
              }
            },
            "email": {
                "required": true
            },
            "succeed": {
                "required": true
            },
        }
    }
});

describe("POST /api/join", function () {
    var host = spec.host(config.host);

    before('truncate users table', function () {
      knex('users').truncate().return(true);
    });

    it("should fail with invalid email", function (done) {
        host.api(API).params({
            "username": "Test",
            "password": "123abc!",
            "email": "invalid"
        }).success(function (data, res) {
            assert.equal(data.succeed, false);
            done();
        });
    });

    it("should succeed with valid email", function (done) {
        host.api(API).params({
            "username": "Test",
            "password": "123abc!",
            "email": "test@test.com"
        }).success(function (data, res) {
            assert.equal(data.succeed, true);
            assert.equal(data.email, "test@test.com");
            done();
        });
    });

    it("should fail with duplicate users", function (done) {
        host.api(API).params({
            "username": "user-one",
            "password": "123abc!",
            "email": "duplicate@test.com"
        }).success(function (first, res) {
            assert.equal(first.succeed, true);
            assert.equal(first.email, "duplicate@test.com");
            host.api(API).params({
              "username": "user-two",
              "password": "123abc!",
              "email": "duplicate@test.com"
            }).success(function (second, res) {
              assert.equal(second.succeed, false);
              done();
            });
        });
    });
});

module.exports = API;

