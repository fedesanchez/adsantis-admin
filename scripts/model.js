/**
 * backbone model definitions for SANTIS
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Categoria Backbone Model
 */
model.CategoriaModel = Backbone.Model.extend({
	urlRoot: 'api/categoria',
	idAttribute: 'idCategoria',
	idCategoria: '',
	nombre: '',
	defaults: {
		'idCategoria': null,
		'nombre': ''
	}
});

/**
 * Categoria Backbone Collection
 */
model.CategoriaCollection = model.AbstractCollection.extend({
	url: 'api/categorias',
	model: model.CategoriaModel
});

/**
 * Consejo Backbone Model
 */
model.ConsejoModel = Backbone.Model.extend({
	urlRoot: 'api/consejo',
	idAttribute: 'idConsejo',
	idConsejo: '',
	html: '',
	titulo: '',
	defaults: {
		'idConsejo': null,
		'html': '',
		'titulo': ''
	}
});

/**
 * Consejo Backbone Collection
 */
model.ConsejoCollection = model.AbstractCollection.extend({
	url: 'api/consejos',
	model: model.ConsejoModel
});

/**
 * Linea Backbone Model
 */
model.LineaModel = Backbone.Model.extend({
	urlRoot: 'api/linea',
	idAttribute: 'idLinea',
	idLinea: '',
	idCategoria: '',
	img: '',
	resumen:'',
	descripcion: '',
	atributos: '',
	nombre: '',
	novedad:'',
	colorFondo:'',
	defaults: {
		'idLinea': null,
		'idCategoria': '',
		'img': '',
		'resumen':'',
		'descripcion': '',
		'atributos': '',
		'nombre': '',
		'novedad':'',
		'colorFondo':''
	}
});

/**
 * Linea Backbone Collection
 */
model.LineaCollection = model.AbstractCollection.extend({
	url: 'api/lineas',
	model: model.LineaModel
});

/**
 * Slider Backbone Model
 */
model.SliderModel = Backbone.Model.extend({
	urlRoot: 'api/slider',
	idAttribute: 'idSlider',
	idSlider: '',
	imgFondo: '',
	imgProducto: '',
	nombreProducto: '',
	descSupProd: '',
	descInfProd: '',
	link: '',
	orden: '',
	habilitado: '',
	defaults: {
		'idSlider': null,
		'imgFondo': '',
		'imgProducto': '',
		'nombreProducto': '',
		'descSupProd': '',
		'descInfProd': '',
		'link': '#',
		'orden': '1',
		'habilitado': '1'
	}
});

/**
 * Slider Backbone Collection
 */
model.SliderCollection = model.AbstractCollection.extend({
	url: 'api/sliders',
	model: model.SliderModel
});

/**
 * SliderTa Backbone Model
 */
model.SliderTaModel = Backbone.Model.extend({
	urlRoot: 'api/sliderta',
	idAttribute: 'idSliderTa',
	idSliderTa: '',
	imgProducto: '',
	titProducto: '',
	titProp1: '',
	descProp1: '',
	titProp2: '',
	descProp2: '',
	titProp3: '',
	descProp3: '',
	link: '',
	orden: '',
	habilitado: '',
	defaults: {
		'idSliderTa': null,
		'imgProducto': '',
		'titProducto': '',
		'titProp1': '',
		'descProp1': '',
		'titProp2': '',
		'descProp2': '',
		'titProp3': '',
		'descProp3': '',
		'link': '#',
		'orden': '1',
		'habilitado': '1'
	}
});

/**
 * SliderTa Backbone Collection
 */
model.SliderTaCollection = model.AbstractCollection.extend({
	url: 'api/slidertas',
	model: model.SliderTaModel
});

/**
 * Testimonio Backbone Model
 */
model.TestimonioModel = Backbone.Model.extend({
	urlRoot: 'api/testimonio',
	idAttribute: 'idTestimonio',
	idTestimonio: '',
	texto: '',
	autor: '',
	profesion: '',
	img: '',
	defaults: {
		'idTestimonio': null,
		'texto': '',
		'autor': '',
		'profesion': '',
		'img': ''
	}
});

/**
 * Testimonio Backbone Collection
 */
model.TestimonioCollection = model.AbstractCollection.extend({
	url: 'api/testimonios',
	model: model.TestimonioModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'idUsuario',
	idUsuario: '',
	username: '',
	password: '',
	nombre: '',
	apellido: '',
	defaults: {
		'idUsuario': null,
		'username': '',
		'password': '',
		'nombre': '',
		'apellido': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

/**
 * PuntoVenta Backbone Model
 */
model.PuntoVentaModel = Backbone.Model.extend({
	urlRoot: 'api/puntoventa',
	idAttribute: 'idPunto',
	idPunto: '',
	nombre: '',
	direccion: '',
	telefono: '',
	email: '',
	latitud: '',
	longitud: '',
	defaults: {
		'idPunto': null,
		'nombre': '',
		'direccion': '',
		'telefono': '',
		'email': '',
		'latitud': '',
		'longitud': ''
	}
});

/**
 * PuntoVenta Backbone Collection
 */
model.PuntoVentaCollection = model.AbstractCollection.extend({
	url: 'api/puntos de ventas',
	model: model.PuntoVentaModel
});

/**
 * Salon Backbone Model
 */
model.SalonModel = Backbone.Model.extend({
	urlRoot: 'api/salon',
	idAttribute: 'idSalon',
	idSalon: '',
	nombre: '',
	direccion: '',
	telefono: '',
	email: '',
	latitud: '',
	longitud: '',
	defaults: {
		'idSalon': null,
		'nombre': '',
		'direccion': '',
		'telefono': '',
		'email': '',
		'latitud': '',
		'longitud': ''
	}
});

/**
 * Salon Backbone Collection
 */
model.SalonCollection = model.AbstractCollection.extend({
	url: 'api/salones',
	model: model.SalonModel
});
