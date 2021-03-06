
#include <iostream>
#include <fstream>
#include <stdint.h>
#include <vector>
#include <pcl/io/pcd_io.h>
#include <pcl/point_types.h>

using namespace std;

int main(int argc, char** argv)
{
        string filename;
        filename = string(argv[1]);
        std::cout << "filename=" << filename << endl;

        pcl::PointCloud<pcl::PointXYZRGB> cloud;
        pcl::PointXYZRGB p;

        int num_points;
        float r, g, b;

        ifstream infile;
        ofstream outfile;

        //outfile.open("mytext_1.txt");


        infile.open(filename);
        //outfile.open("002.pcd");

        //num_points =0;

        if(!infile)
        {
                // Opening a file encounters a problem
                cerr << "Error: file could not be opened!" << endl;
                exit(1);
        }
        else
        {
                // Reading file
                while(!infile.eof())
                {
                        infile >> p.x;
                        infile >> p.y;
                        infile >> p.z;
                        infile >> r;
                        infile >> g;
                        infile >> b;
                        p.r = (uint8_t)(r * 255);
                        p.g = (uint8_t)(g * 255);
                        p.b = (uint8_t)(b * 255);

                        //cout << " Num#: " << num_points << " X: " << p.x << " Y: " <<p.y << " Z: " << p.z << " r: " << p.r << " g: " << (int)p.g << " b:" << (int)p.b << endl;

                        cloud.points.push_back(p);

                        num_points++;
/*
                        if(num_points >= 700000)
                        {
                                break;
                                outfile.close();
                                exit(1);
                        }
*/

                }


///*

                cloud.width = cloud.points.size();
                cloud.height = 1;
                cloud.points.resize(cloud.width*cloud.height);

                infile.close();

                pcl::io::savePCDFileASCII("./data/semi_pointcloud-pcl-1-7.pcd", cloud);
//*/
/*
                outfile<< "# .PCD v0.7 - Point Cloud Data file format"<<endl;
                outfile<< "VERSION 0.7 \n" <<  "FIELDS x y z rgb"<<endl;
                outfile<< "SIZE 4 4 4 4 \n" << "TYPE F F F F" << endl;
                outfile<< "COUNT 1 1 1 1 \n" << "WIDTH " << num_points << endl;
                outfile<< "HEIGHT 1 \n" << "VIEWPOINT 0 0 0 1 0 0 0" << endl;
                outfile<< "POINTS " << num_points << endl;
                outfile<< "DATA ascii"<<endl;

                vector<float>::iterator it_x = x.begin();
                vector<float>::iterator it_y = y.begin();
                vector<float>::iterator it_z = z.begin();
                vector<uint32_t>::iterator it_rgba = rgba.begin();

                for(int i =0; i<num_points; i++)
                {
                        outfile<< *it_x << " " << *it_y << " " << *it_z << " " << *it_rgba << endl;
                        ++it_x; ++it_y;  ++it_z;  ++it_rgba;
                }

                outfile.close();
*/
        }

        return 0;
}
