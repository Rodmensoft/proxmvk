<template>
    <div>
        <div class="card mb-0">
            <div class="card-header bg-info">
                <h3 class="my-0">Productos por devolver</h3>
            </div>
            <div class="card-body">
                <data-table :resource="resource" ref="datatable">
                    <tr slot="heading">
                        <th>Producto</th>
                        <th>Vendedor</th>
                        <th>Cliente - DNI</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Fecha Vencimiento</th>
                        <th>Cantidad</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                    <tr slot-scope="{ index, row }" :key="index">
                        <td>{{ row.item_description }}</td>
                        <td>{{ row.user_name }}</td>
                        <td>{{ row.customer_name }} - {{ row.customer_document }}</td>
                        <td>{{ row.customer_address }}</td>
                        <td>{{ row.date }}</td>
                        <td>{{ row.due_date }}</td>
                        <td>{{ row.quantity }}</td>
                        <td>
                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info"
                                    @click.prevent="clickDevolver(row.id, row.quantity)">Devolver</button>
                        </td>
                    </tr>
                </data-table>
            </div>

            <devolver-item :showDialog.sync="showDialogDevolver" :maxQuantity="maxQuantity" :recordId="recordId"></devolver-item>
        </div>
    </div>
</template>

<script>

import DataTable from '@components/DataTable.vue'
import DevolverItem from './devolver-item.vue'

export default {
    props: ['type', 'typeUser'],
    components: {DataTable, DevolverItem},
    data() {
        return {
            showHideModalMoveGlobal: false,
            selectedItems: [],
            title: null,
            showDialog: false,
            showDialogDevolver: false,
            maxQuantity: 0,
            showDialogRemove: false,
            showDialogOutput: false,
            resource: 'inventory-to-return',
            recordId: null,
            typeTransaction:null,
            showDialogMovementReport:false,
            showDialogStock: false,
            showHideStockMoveGlobal: false,
            showImportDialog: false,
            showDialogStockReport:false,
            showDialogSpecialAttributes:false,
            special_attribute_type: null,
        }
    },
    created() {
        this.title = 'Inventario'
    },
    methods: {
        clickImportSpecialAttributes(type)
        {
            this.showDialogSpecialAttributes = true
            this.special_attribute_type = type
        },
        clickReport(){
            this.showDialogMovementReport = true
        },
        async onOpenModalMoveGlobal() {
            const itemsSelecteds = await this.$refs.datatable.records.filter(p => p.selected);
            if (itemsSelecteds.length > 0) {
                this.selectedItems = itemsSelecteds;
                this.showHideModalMoveGlobal = true;
            } else {
                this.$message({
                    message: 'Selecciona uno o más productos.',
                    type: 'warning'
                });
            }
        },
        async onChangeSelectedStatus(row) {
            this.$refs.datatable.records = await this.$refs.datatable.records.map(r => {
                if (r.id === row.id) {
                    r.selected = row.selected ? false : true;
                }
                return r;
            });
            this.$forceUpdate();
        },
        onChecktAll() {
            this.$refs.datatable.records = this.$refs.datatable.records.map(r => {
                r.selected = true;
                return r;
            });
        },
        onUnCheckAll() {
            this.$refs.datatable.records = this.$refs.datatable.records.map(r => {
                r.selected = false;
                return r;
            });
        },
        clickDevolver(recordId, quantity) {
            this.recordId = recordId
            this.showDialogDevolver = true
            this.maxQuantity = quantity
        },
        clickCreate(type) {
            this.recordId = null
            this.typeTransaction = type
            this.showDialog = true
        },
        clickRemove(recordId) {
            this.recordId = recordId
            this.showDialogRemove = true
        },
        clickOutput() {
            this.recordId = null
            this.showDialogOutput = true
        },
        clickStock(recordId) {
            this.recordId = recordId
            this.showDialogStock = true
        },
        async onOpenModalStockGlobal() {
            const itemsSelecteds = await this.$refs.datatable.records.filter(p => p.selected);
            if (itemsSelecteds.length > 0) {
                this.selectedItems = itemsSelecteds;
                this.showHideStockMoveGlobal = true;
            } else {
                this.$message({
                    message: 'Selecciona uno o más productos.',
                    type: 'warning'
                });
            }
        },
        clickImport(){
            this.showImportDialog = true
        },
        clickReportStock(){
            this.showDialogStockReport = true
        },

    }
}
</script>
