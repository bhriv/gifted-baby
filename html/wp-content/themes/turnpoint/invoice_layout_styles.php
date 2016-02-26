
<style type="text/css">
/* Force Inline Styles */

#client-document {
  background:#fff;
  border:0;
  color:#222;
  font-family:"Helvetica Neue",Helvetica,Arial,Verdana,"Nimbus Sans L",sans-serif;
  font-size:.75em;
  margin:0;
  padding: 20px;
  position:relative;
  z-index:1
}

#client-document hr {
  background:#ccc;
  color:#ccc;
  width:100%;
  height:2px;
  margin:2em 0;
  padding:0;
  border:none
}

#client-document hr.space {
  background:#fff;
  color:#fff
}

#client-document h1,#client-document h2,#client-document h3,#client-document h4,#client-document h5,#client-document h6 {
  font-family:"Helvetica Neue",Arial,Helvetica,sans-serif
}

#client-document code {
  font-size:.9em;
  font-family:"andale mono","lucida console",monospace
}

#client-document a img {
  border:none
}

#client-document p {
  margin:0 0 1em
}

#client-document p img.top {
  margin-top:0
}

#client-document blockquote {
  margin:1.5em;
  padding:1em;
  font-style:italic;
  font-size:.9em
}

#client-document .small {
  font-size:.9em
}

#client-document .large {
  font-size:1.1em
}

#client-document .quiet {
  color:#999
}

#client-document .hide {
  display:none
}

.client-doc-header {
  padding:0 5px;
  position:relative
}

.client-doc-doc-type {
  float:right;
  font-size:1.8em;
  font-weight:700;
  line-height:1em;
  margin:0 0 15px;
  width:181px
}

.client-doc-name {
  float:left;
  margin-bottom:30px
}

.client-doc-name h1 {
  font-size:3em;
  font-weight:700;
  line-height:1.1em;
  margin:0;
  min-height:80px;
  padding:0;
  width:300px
}

.client-doc-name img {
  display:block
}

.client-doc-from {
  float:right;
  margin-bottom:30px
}

.client-doc-for {
  float:right;
  margin-bottom: 30px;
}

.client-doc-address h3 {
  color:#555;
  float:left;
  font-size:1em;
  font-weight:400;
  margin:0;
  padding-top:4px;
  text-align:right;
  width:105px
}

.client-doc-address div {
  border-left:1px solid #ccc;
  margin-left:115px;
  padding:4px 0 4px 10px;
  width:181px
}

.client-doc-address strong {
  display:block;
  font-size:1.2em;
  padding-bottom:2px
}

.client-doc-details {
  float:left
}


.client-doc-details table {
  text-align:left;
  width:330px
}

.client-doc-details td{
  border-bottom: none;
}
.client-doc-details table td.label {
  color:#555;
  font-size:inherit;
  padding:4px 10px 4px 0;
  min-height:17px;
  width:70px;
  white-space:nowrap;
  vertical-align:top;
  background-color: #fff;
  text-shadow: none;
}

.client-doc-details table td.definition {
  border-left:1px solid #ccc;
  min-height:17px;
  padding:4px 10px;
  vertical-align:top
}

.client-doc-items {
  border-collapse:collapse;
  margin:50px 0;
  width:100%
}

.client-doc-items th {
  border-bottom:1px solid #ccc;
  border-right:1px solid #ccc;
  font-size:.9em;
  font-weight:700;
  line-height:1.1em;
  padding:3px 10px 2px;
  text-align:left;
  vertical-align:top
}

.client-doc-items td {
  border-bottom:1px solid #ccc;
  border-right:1px solid #ccc;
  float:none;
  font-weight:400;
  padding:10px;
  text-align:left;
  vertical-align:top;
  text-shadow: none;
}

.client-doc-items .first {
  padding-left:5px
}

.client-doc-items .last {
  border-right:0;
  padding-right:5px
}

.client-doc-items tr.row-even td {
  background:#f6f6f6
}

.client-doc-items .item-type {
  width:70px
}

#client-document .client-doc-items .item-description p:last-child {
  margin:0
}

.client-doc-items .item-qty {
  text-align:right;
  width:50px
}

.client-doc-items .item-unit-price {
  text-align:right;
  white-space:nowrap;
  width:75px
}

.client-doc-items .item-amount {
  font-weight:700;
  text-align:right;
  white-space:nowrap;
  width:85px
}

.client-doc-summary td {
  border:0;
  color:#555;
  padding:2px 10px;
  text-align:right;
  background-color: #fff;
}

.client-doc-summary td.subtotal {
  font-size:1.1em;
  font-weight:700;
  color:#222;
  padding-right:5px;
  white-space:nowrap
}

.client-doc-summary tr:first-child td {
  padding-top:20px;
  background-color: #fff;
}

.client-doc-summary tr.total td {
  color:#222;
  font-size:1.3em;
  font-weight:700;
  padding-top:1.1em
}

.client-doc-summary tr.total td.total {
  padding-right:5px;
  white-space:nowrap
}

.client-doc-notes {
  border-top:1px solid #ccc;
  padding:0 5px;
  margin:0
}

* html .client-doc-notes {
  overflow-x:hidden
}

.client-doc-notes h3 {
  font-size:.9em;
  font-weight:700;
  margin:5px 0 10px
}

/* Hidden Columns */
.hide-type-column .client-doc-items .item-type {
  display:none
}

.hide-quantity-column .client-doc-items .item-qty {
  display:none
}

.hide-unit_price-column .client-doc-items .item-unit-price {
  display:none
}

.hide-description-column .client-doc-items .item-description {
  display:none
}

.hide-amount-column .client-doc-items .item-amount {
  display:none
}

/* Address-on-left Template */
#client-document.address-on-left .client-doc-details {
  float:right
}

#client-document.address-on-left .client-doc-details table {
  width:307px
}

#client-document.address-on-left .client-doc-details table td.label {
  text-align:right;
  width:105px
}

#client-document.address-on-left .client-doc-for {
  float:left
}

#client-document.address-on-left .client-doc-for h3 {
  width:70px;
  text-align:left
}

#client-document.address-on-left .client-doc-for div {
  margin-left:80px;
  width:200px
}

#client-document.address-on-left .subject-address-on-right {
  display:none
}

#client-document.address-on-left .subject-address-on-left {
  display:block!important
}

.subject-address-on-left {
  margin:20px 0 -10px
}

.subject-address-on-left h3 {
  width:70px;
  text-align:left
}

.subject-address-on-left div {
  margin-left:80px;
  width:auto
}
@media (max-width: 767px){
  .outlined{
    padding: 5px;
  }
  #client-document {
    padding: 5px;
    font-size:.6em;
  }
  .client-doc-items th{
    padding: 3px;
  }
  .client-doc-items td{
    padding: 3px;
  }
  .client-doc-items .item-type {
    width:45px
  }

  .client-doc-items .item-qty {
    text-align:right;
    width:33px;
  }

  .client-doc-items .item-unit-price {
    width:29px;
  }

  .client-doc-items .item-amount {
    width:45px
  }

}
@media print {
  .header-container,
  .footer-container,
  #breadcrumbs,
  .do-not-print {
    display:none
  }

  #client-document a:link,#client-document a:visited {
    background:transparent;
    font-weight:700;
    text-decoration:underline
  }
}
</style>
</style>