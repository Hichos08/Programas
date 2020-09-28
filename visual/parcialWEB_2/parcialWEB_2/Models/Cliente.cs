using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace parcialWEB_2.Models
{
    public class Cliente
    {
        [Key]
        public int IdCliente { get; set; }
        public string Nombre { set; get; }
        [Required]
        public string Apellido { set; get; }
        [Required]
        public string Telefono { set; get; }
        public string Direccion { set; get; }

        public virtual ICollection<Factura> Facturas { set; get; }

    }
}