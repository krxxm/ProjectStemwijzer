using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
{
    internal class vragen
    {
        public int Id { get; set; }
        public string electionid { get; set; }

        public string text { get; set; }

        public override string ToString()
        {
            return $"{text}?";
        }
    }
}
