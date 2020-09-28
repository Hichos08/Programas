using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(parcialWEB_2.Startup))]
namespace parcialWEB_2
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
