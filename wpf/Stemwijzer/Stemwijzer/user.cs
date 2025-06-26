using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
{
    public class User
    {
        public int Id { get; set; }
        public string Naam { get; set; }
        public string wachtwoord { get; set; }
        public string Email { get; set; }
        public string Role {get; set; }

        public override string ToString()
        {
            return $"{Naam}  Role : {Role}";
        }
    }
}
