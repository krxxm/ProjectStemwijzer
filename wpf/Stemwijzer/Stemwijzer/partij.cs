using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
    {
        public class Partij
        {
            public int Id { get; set; }
            public string Naam { get; set; }

            public DateTime create_date { get; set; }


        public override string ToString()
            {
            return $"{Naam} - Opgericht op: {create_date}";
            }
        }
    }


