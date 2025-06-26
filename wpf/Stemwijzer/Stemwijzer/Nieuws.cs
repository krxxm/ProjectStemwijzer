using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Stemwijzer
{
    public class Nieuws
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Discription { get; set; }
        public string Content { get; set; }
   

        public override string ToString()
        {
            return $"{Title}  {Discription}";

        }
    }
}
