using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Controls;

namespace Stemwijzer
{
    public class Verkiezingen
    {
        public int Id { get; set; }
        public string title { get; set; }
        public string discription { get; set; }
        public DateTime start_date { get; set; }
        public DateTime end_date { get; set; }


        public override string ToString()
        {
            return $"{title} start : {start_date}  eind: {end_date}";
        }
    }
}

