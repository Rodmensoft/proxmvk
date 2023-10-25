<template>
    <div>
        <div class="card mb-0">
            <div class="card-header bg-info">
                <h3 class="my-0">Listado de Productos por Devolver</h3>
            </div>
            <div class="card-body">
                <data-table :resource="resource" ref="datatable">
                    <tr slot="heading">
                        <th>
                            <el-dropdown>
                                <span class="el-dropdown-link">
                                    <el-button>
                                        <i class="fa fa-ellipsis-v"></i>
                                    </el-button>
                                </span>
                                <el-dropdown-menu slot="dropdown">
                                    <el-dropdown-item @click.native="onChecktAll">Seleccionar todo</el-dropdown-item>
                                    <el-dropdown-item @click.native="onUnCheckAll">Deseleccionar todo</el-dropdown-item>
                                    <el-dropdown-item @click.native="onOpenModalMoveGlobal">Trasladar</el-dropdown-item>
                                    <el-dropdown-item @click.native="onOpenModalStockGlobal">Ajustar stock</el-dropdown-item>
                                </el-dropdown-menu>
                            </el-dropdown>
                        </th>
                        <th>Producto</th>
                        <th>Almacén</th>
                        <th class="text-right">Stock</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                    <tr slot-scope="{ index, row }" :key="index">
                        <td>
                            <el-switch v-model="row.selected" @click="onChangeSelectedStatus(row)"></el-switch>
                        </td>
                        <!-- <td>{{ index }}</td> -->
                        <td>{{ row.item_fulldescription }}</td>
                        <td>{{ row.warehouse_description }}</td>
                        <td class="text-right">{{ row.stock }}</td>
                        <td class="text-right">
                            <button type="button" class="btn waves-effect waves-light btn-xs btn-info"
                                    @click.prevent="clickMove(row.id)">Trasladar</button>
                            <button v-if="typeUser == 'admin'" type="button" class="btn waves-effect waves-light btn-xs btn-warning"
                                    @click.prevent="clickRemove(row.id)">Remover</button>
                            <button type="button" class="btn waves-effect waves-light btn-xs btn-warning"
                                    @click.prevent="clickStock(row.id)">
                                Ajuste
                                <el-tooltip class="item"
                                            content="Ajuste: stock del sistema no cuadre con el stock real"
                                            effect="dark"
                                            placement="top">
                                    <i class="fa fa-info-circle"></i>
                                </el-tooltip>
                            </button>
                        </td>
                    </tr>
                </data-table>
            </div>
        </div>
    </div>
</template>

<script>

import DataTable from '@components/DataTable.vue'

export default {
    props: ['type', 'typeUser'],
    components: {DataTable},
    data() {
        return {
            showHideModalMoveGlobal: false,
            selectedItems: [],
            title: null,
            showDialog: false,
            showDialogMove: false,
            showDialogRemove: false,
            showDialogOutput: false,
            resource: 'inventory',
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
        clickMove(recordId) {
            this.recordId = recordId
            this.showDialogMove = true
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
