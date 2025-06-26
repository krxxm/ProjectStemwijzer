using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
{
    public class Standpunten
    {
        public int Id { get; set; }
        public int electionid { get; set; }

        public string text { get; set; }

        public override string ToString()
        {
            return $"{text}";
        }
    }
}

