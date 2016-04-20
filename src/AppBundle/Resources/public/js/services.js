app.factory('User', function ($http, $q) {
    return {
        login: function (username, password) {
            var self = this;
            return $http.get('/login').then(function (data) {
                console.log("hit login");
                if (data.status != 200) {
                    return $q.reject("Couldn't load /login");
                }
                var tokenMatch = data.data.match(/ name="_csrf_token" value="([^"]+)"/)
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
