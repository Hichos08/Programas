using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace parcialWEB_2.Models
{
    public class Producto
    {
        [Key]
        [Display(Name = "Codigo Producto")]
        public int IdProducto { set; get; }
        [Display(Name = "Nombre")]
        public string NombreProducto { set; get; }
        [DisplayFormat(DataFormatString = "{0:C2}", ApplyFormatInEditMode = false)]
        [Display(Name = "Precio Unitario")]
        public decimal PrecioUnitario { set; get; }

        public virtual ICollection<DetalleFactura> DetallesOrden { set; get; }
    }
}