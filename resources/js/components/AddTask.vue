<template>
    <div class="add-task">
        <div class="container justify-content-left">
            <div class="row">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary my-5" data-toggle="modal" data-target="#addModal">
                Ajouter une tâche
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="">Nom de la tâche</label>
                                    <textarea v-model="name" name="name" id="name" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button v-on:click="storeTask" type="submit" class="btn btn-success" data-dismiss="modal">Créer ma tâche</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            name: '',
        }
    },

    methods: {
        storeTask() {
            axios.post('http://localhost:8000/add-task', {
                nom: this.name
            })
            .then(async res => {
                const data = await res.data['data']
                this.$emit('new-task', data)
                this.$emit('info-task', 'Tâche ajoutée')
            })
            .catch(err => console.log(err))
        }
    }
}
</script>

<style>

</style>
