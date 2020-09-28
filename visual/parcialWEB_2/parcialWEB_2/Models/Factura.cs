using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace parcialWEB_2.Models
{
    public class Factura
    {
        [Key]
        [Display(Name = "Numero Factura")]
        public int IdFactura { get; set; }
        [DisplayFormat(DataFormatString = "{0:dd/MM/yyyy}", ApplyFormatInEditMode = true)]
        [DataType(DataType.Date)]
        public DateTime Fecha { get; set; }
        [Display(Name = "Codigo Cliente")]
        public int IdCliente { get; set; }
        public virtual Cliente Cliente { set; get; }
        public virtual ICollection<DetalleFactura> Productos { set; get; }
    }
}