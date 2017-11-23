const path = require('path');

var cache = {};

function store(key, value) {
    cache[path.normalize(key)] = value;
}
a=path.join('foo/', 'baz/', '../bar'); // => "foo/bar"
store('foo/bar', 1);
store('foo//baz//../bar', 2);
console.log(cache);  // => { "foo/bar": 2 }
console.log(a);