<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Skelbimo kūrimas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="post-create" action="/posts" method="POST">
                        <input type="hidden" name="_token" :value="csrf">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Pavadinimas:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-form-label">Kategorija:</label>
                            <select class="form-control" id="category" name="category_id" @change="onChange($event)">
                                <option v-for="category in categories" :value="category.id">{{category.title}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub-category" class="col-form-label">Sub-kategorija:</label>
                            <select class="form-control" id="sub-category" name="subcategory_id">
                                <option v-for="sub in subcategories" :value="sub.id">{{sub.title}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-form-label">Aprašymas:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Uždaryti</button>
                    <button type="submit" class="btn btn-primary" form="post-create">Sukurti skelbimą</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories'],
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                subcategories: []
            }
        },
        methods: {
            //Gets all sub-categories from api, and if it finds a match, pushes into data.subcategories
            getSub(id) {
                //Using axios instead of ajax, axios is pre-built JavaScript library in laravel
                axios.get('/api/sub').then(response => {
                    this.subcategories = []; //removes previous matches
                    response.data.forEach(sub => {
                        sub.category_id == id ? this.subcategories.push(sub) : '';
                    });
                });
            },

            //Change sub-category on select field change
            onChange(e) {
                this.getSub(e.target.value);
            }
        },
        mounted() {
            //Load first sub-category data from api with category_id = 1
            this.getSub(1);
        }
    }
</script>
