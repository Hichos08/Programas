using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace parcialWEB_2.Models
{
    public class DetalleFactura
    {
        [Key]
        public int IdDetalleOrden { set; get; }
        public int IdFactura { set; get; }
        public int IdProducto { set; get; }
        public int Cantidad { set; get; }
        public decimal preciounitario { set; get; }
        public virtual Factura Facturas { set; get; }
        public virtual Producto Productos { set; get; }
    }
}