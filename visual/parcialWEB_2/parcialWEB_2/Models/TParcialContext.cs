﻿using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace parcialWEB_2.Models
{
    public class TParcialContext : DbContext
    {
        // You can add custom code to this file. Changes will not be overwritten.
        // 
        // If you want Entity Framework to drop and regenerate your database
        // automatically whenever you change your model schema, please use data migrations.
        // For more information refer to the documentation:
        // http://msdn.microsoft.com/en-us/data/jj591621.aspx
    
        public TParcialContext() : base("name=TParcialContext")
        {
        }

        public System.Data.Entity.DbSet<parcialWEB_2.Models.Cliente> Clientes { get; set; }

        public System.Data.Entity.DbSet<parcialWEB_2.Models.Factura> Facturas { get; set; }

        public System.Data.Entity.DbSet<parcialWEB_2.Models.DetalleFactura> DetalleFacturas { get; set; }

        public System.Data.Entity.DbSet<parcialWEB_2.Models.Producto> Productoes { get; set; }
    }
}
