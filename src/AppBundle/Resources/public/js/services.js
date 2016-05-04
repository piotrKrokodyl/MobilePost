app.factory('User', function ($http, $q) {
    return {
        login: function (username, password) {
            var self = this;
            return $http.get('/login').then(function (data) {
                console.log("hit login");
                if (data.status != 200) {
                    return $q.reject("Couldn't load /login");
                }
                var tokenMatch = data.data.match(/ name="_csrf_token" value="([^"]+)"/);
                if (!tokenMatch) {
                    return $q.reject("Can't find CSRF token");
                }
                return $http.post('/login_check', {'_csrf_token': tokenMatch[1], '_username': username, '_password': password});
            }).then(function (data) {
                return self.queryCurrentUser();
            });
        },
        logout: function () {
            this.current = null;
            $http.get('/logout');
        },
        queryCurrentUser: function () {
            var self = this;
            return $http.get('/api/v1/me.json')
            .then(function (data) {
                self.queriedUser = true;
                if (!data.data.id) {
                    self.current = null;
                    return $q.reject('no user logged in');
                }
                self.current = data.data;
                return self.current;
            });
        },
        getCurrentUser: function () {
            if (this.queriedUser) {
                if (this.current) {
                    return $q.resolve(this.current);
                } else {
                    return $q.reject();
                }
            } else {
                return this.queryCurrentUser();
            }
        },
        queriedUser: false,
        current: null
    };
});

app.factory('ParcelOrder', ['$resource', function ($resource) {
    return $resource('/api/v1/parcelorders/:id.json', {}, {
        query: {method: 'GET', isArray: true},
        queryUnassigned: {method: 'GET', isArray: true, url: '/api/v1/parcelorders/unassigned.json'}
    });
}]);

app.factory('Postman', ['$resource', function ($resource) {
    return $resource('/api/v1/postmans/:id.json', {}, {
        query: {method: 'GET', isArray: true},
    });
}]);

app.factory('Task', ['$resource', function ($resource) {
    return $resource('/api/v1/tasks/:id.json', {}, {
        post: {method: 'POST'}
    });
}]);
