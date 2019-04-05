// Bootstrap4 + FontAwesome Icon
export default {
    table: {
        tableWrapper: '',
        tableHeaderClass: 'mb-0',
        tableBodyClass: 'mb-0',
        tableClass: 'table table-top-campaign',
        loadingClass: 'loading',
        ascendingIcon: 'fas fa-chevron-up',
        descendingIcon: 'fas fa-chevron-down',
        ascendingClass: 'sorted-asc',
        descendingClass: 'sorted-desc',
        sortableIcon: 'fas fa-sort',
        detailRowClass: 'vuetable-detail-row',
        handleIcon: 'fas fa-bars text-secondary',
        renderIcon(classes, options) {
            return `<i class="${classes.join(' ')}"></span>`
        }
    },
    pagination: {
        wrapperClass: 'pagination float-right',
        activeClass: 'active',
        disabledClass: 'disabled',
        pageClass: 'page-item',
        linkClass: 'page-link',
        paginationClass: 'pagination',
        paginationInfoClass: 'float-left',
        dropdownClass: 'form-control',
        icons: {
            first: 'fas fa-chevron-left',
            prev: 'fas fa-chevron-left',
            next: 'fas fa-chevron-right',
            last: 'fas fa-chevron-right',
        }
    }
}