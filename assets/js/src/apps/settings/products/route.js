var Route = require('lib/config/route');
var App = require('lib/config/application');
var View = require('./view');

var Products = Route.extend({

  initialize: function( options ) {
    options = options || {};
    this.container = options.container;
    this.model = options.model;
  },

  render: function() {
    var view = new View({ model: this.model });
    this.container.show(view);
  }

});

module.exports = Products;
App.prototype.set('SettingsApp.Products.Route', Products);