
// Add row into table
var addRowTable = {
    options: {
        addButton: "#addToTable",
        table: "#addrowExample",
        dialog: {}
    },
    initialize: function() {
        this.setVars().build().events()
    },
    setVars: function() {
        return this.$table = $(this.options.table),
            this.$addButton = $(this.options.addButton),
            this.dialog = {},
            this.dialog.$wrapper = $(this.options.dialog.wrapper),
            this.dialog.$cancel = $(this.options.dialog.cancelButton),
            this.dialog.$confirm = $(this.options.dialog.confirmButton),
            this
    },
    build: function() {
        return this.datatable = this.$table.DataTable({
            aoColumns: [null, null, null, {
                bSortable: !1
            }],
        }), window.dt = this.datatable, this
    },
    events: function() {
        var object = this;
        return this.$table.on("click", "button.button-save", function(e) {
            e.preventDefault();
            var country = $(this).closest("tr").find('.country input').val();
            var country_code = $(this).closest("tr").find('.country_code input').val();
            var thumbnail = $(this).closest("tr").find('.thumbnail input').val();
            var id = $(this).closest("tr").attr('id');
            id = id?id:'';
            let data = {id,thumbnail,country_code,country};
            var link = $('input[name=update-link]').val();
            ele = $(this).closest("tr");
            update_data(data,link ,'POST', ele, object, function (ele, object,data) {
                if(data.res){
                    if(!$(ele).attr('id')){
                        $(ele).attr('id',data.res);
                    }
                    object.rowSave(ele);
                }

            });
        }).on("click", "button.button-discard", function(e) {
            e.preventDefault(), object.rowCancel($(this).closest("tr"))
        }).on("click", "button.button-edit", function(e) {
            e.preventDefault(), object.rowEdit($(this).closest("tr"))
        }).on("click", "button.button-remove", function(e) {
            e.preventDefault();
            var $row = $(this).closest("tr");
            var link = $('input[name=delete-link]').val();
            var data = {
                'id': $($row).attr('id')
            };
            showConfirmMessage(data,link,'POST',$row, function(ele,object){
                object.rowRemove(ele);
            },object);

        }), this.$addButton.on("click", function(e) {
            e.preventDefault(), object.rowAdd()
        }), this.dialog.$cancel.on("click", function(e) {
            e.preventDefault(), $.magnificPopup.close()
        }), this
    },
    rowAdd: function() {
        this.$addButton.attr({
            disabled: "disabled"
        });
        var actions, data, $row;
        actions = [
            '<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-save" data-toggle="tooltip" data-original-title="Save" hidden><i class="fas fa-save" aria-hidden="true"></i></button>',
            '<button class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard" data-toggle="tooltip" data-original-title="Discard" hidden><i class="fas fa-times-circle" aria-hidden="true"></i></button>',
            '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-edit" data-toggle="tooltip" data-original-title="Edit"><i class="fas fa-edit" aria-hidden="true"></i></button>',
            '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove" data-toggle="tooltip" data-original-title="Remove"><i class="fas fa-trash" aria-hidden="true"></i></button>'].join(" "),
            data = this.datatable.row.add(["", "", "", actions]),
            ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:last").addClass("actions"),
            ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:nth-child(3)").addClass("thumbnail"),
            ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:nth-child(2)").addClass("country_code"),
            ($row = this.datatable.row(data[0]).nodes().to$()).addClass("adding").find("td:nth-child(1)").addClass("country"),
            this.rowEdit($row), this.datatable.order([0, "asc"]).draw()
    },
    rowCancel: function($row) {
        var $actions, data;
        $row.hasClass("adding") ? this.rowRemove($row) : (($actions = $row.find("td.actions")).find(".button-discard").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), data = this.datatable.row($row.get(0)).data(), this.datatable.row($row.get(0)).data(data), this.handleTooltip($row), this.datatable.draw())
    },
    rowEdit: function($row) {
        var data, object = this;
        data = this.datatable.row($row.get(0)).data(), $row.children("td").each(function(i) {
            var $this = $(this);
            $this.hasClass("actions") ? object.rowSetActionsEditing($row) : $this.html('<input type="text" class="form-control input-block" value="' + data[i] + '"/>')
        })
    },
    rowSave: function($row) {
        var $actions, object = this,
            values = [];
        $row.hasClass("adding") && (this.$addButton.removeAttr("disabled"), $row.removeClass("adding")), values = $row.find("td").map(function() {
            var $this = $(this);
            return $this.hasClass("actions") ? (object.rowSetActionsDefault($row), object.datatable.cell(this).data()) : $.trim($this.find("input").val())
        }), ($actions = $row.find("td.actions")).find(".button-save").tooltip("hide"), $actions.get(0) && this.rowSetActionsDefault($row), this.datatable.row($row.get(0)).data(values), this.handleTooltip($row), this.datatable.draw()
    },
    rowRemove: function($row) {
        $row.hasClass("adding") && this.$addButton.removeAttr("disabled"), this.datatable.row($row.get(0)).remove().draw()
    },
    rowSetActionsEditing: function($row) {
        $row.find(".on-editing").removeAttr("hidden"), $row.find(".on-default").attr("hidden", !0)
    },
    rowSetActionsDefault: function($row) {
        $row.find(".on-editing").attr("hidden", !0), $row.find(".on-default").removeAttr("hidden")
    },
    handleTooltip: function($row) {
        $row.find('[data-toggle="tooltip"]').tooltip()
    }
};
$(function() {
    addRowTable.initialize()
})
