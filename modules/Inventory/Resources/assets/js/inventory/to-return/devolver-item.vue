<template>
    <el-dialog :title="titleDialog"
               :visible="showDialog"
               :close-on-click-modal="false"
               :close-on-press-escape="false"
               append-to-body
               @close="close"
               @open="create">
        <form autocomplete="off" @submit.prevent="submit">
            <div class="form-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label">Cantidad a devolver</label>
                            <el-input v-model="form.quantity"></el-input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions text-right mt-4">
                <el-button @click.prevent="close()">Cancelar</el-button>
                <el-button type="primary" native-type="submit" :loading="loading_submit">Aceptar</el-button>
            </div>
        </form>
    </el-dialog>

</template>

<script>

export default {
    props: ['showDialog', 'maxQuantity', 'recordId'],
    data() {
        return {
            loading_submit: false,
            titleDialog: null,
            errors: {},
            form: {},
        }
    },
    created() {
        this.initForm()
    },
    methods: {
        initForm() {
            this.errors = {}
            this.form = {
                id: this.recordId,
                quantity: 0
            }
        },
        async create() {
            this.titleDialog = 'Devolver producto prestado'
        },
        async submit() {
            if (parseInt(this.quantity) > parseInt(this.maxQuantity)) {
                return this.$message.error('La cantidad ingresada no puede ser mayor al total de productos por devolver');
            }


            this.form.id = this.recordId

            this.loading_submit = true
            await this.$http.post(`/inventory-to-return/devolver`, this.form)
                .then(response => {
                    if (response.data.success) {
                        this.$message.success(response.data.message)
                        this.$eventHub.$emit('reloadData')
                        this.close()
                    } else {
                        this.$message.error(response.data.message)
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    } else {
                        console.log(error)
                    }
                })
                .then(() => {
                    this.loading_submit = false
                })
        },
        close() {
            this.$emit('update:showDialog', false)
            this.initForm()
        },
    }
}
</script>
