vm = new Vue({

    el: "#app",
    template: '#app-template',
    data: {
        items: items,
        active: {},
        created: {},
        edited: {},

        state: 'normal',

        errors: {},
        response: {ok: true}
    },

    methods: {

        activate: function(item) {
            if (this.active != item){
                this.setState('normal')
            }
            this.active = item
        },

        index: function(created) {
            this.$http.get().then(function (response) {
                this.items = response.data
                this.response = response
            }, function (response) {
                this.response = response
            })
        },

        store: function(created) {
            this.$http.post('', created)
            .then(function (response) {
                console.log(response.data[0])
                this.items.push(response.data[0])
                $('.modal').modal('hide');
            }, function (response) {
                this.errors = response.data
            })
        },

        edit: function(item) {
            this.activate(item)
            this.edited = jQuery.extend(true, {}, item)
        },

        update: function(edited) {
            this.$http.put('' + edited.id, edited)
            .then(function (response) {
                for (var prop in edited) {
                    if (edited.hasOwnProperty(prop)){
                        console.log(prop)
                        this.active[prop] = edited[prop]
                    }
                }
                $('.modal').modal('hide');
            }, function (response) {
                this.errors = response.data
            })
        },

        destroy : function(active) {
            this.$http.delete('' + active.id)
            .then(function (response) {
                this.items.$remove(active)
                this.setState('normal')
            }, function (response) {})
        },

        setState: function(state) {
            this.state = state
        },

    },

    http: {
        // root: '/api/articles',
        root: 'http://localhost:8001/articles',
        headers: { 'X-CSRF-TOKEN': _token }
    }

})

$('.modal').on('hidden.bs.modal', function () {
    vm.created = {}
    vm.edited = {}
    vm.errors = {}
})
